<?php

namespace Vatsim\Osticket\AttachmentRetention;

use Http;
use Staff;
use Ticket;

class DeleteAllController
{
    public function __invoke($ticketId): void
    {
        $ticket = Ticket::lookup($ticketId);
        if (! $ticket) {
            Http::response(404, 'Not Found');
        }

        /** @var Staff $thisstaff */
        global $thisstaff;
        if (! $thisstaff || ! $ticket->checkStaffPerm($thisstaff, Ticket::PERM_DELETE)) {
            Http::response(403, 'Forbidden');
        }

        match ($_SERVER['REQUEST_METHOD']) {
            'GET' => $this->show($ticket),
            'POST' => $this->destroy($ticket),
            default => Http::response(405, 'Method Not Allowed'),
        };
    }

    public function show(Ticket $ticket): void
    {
        include __DIR__ . '/../templates/delete-all.php';
    }

    public function destroy(Ticket $ticket): void
    {
        Utils::deleteAttachments($ticket);
        $_SESSION['::sysmsgs']['msg'] = __('Ticket attachments deleted successfully');

        Http::response(201, $ticket->getId());
    }
}
