<?php

namespace Vatsim\Osticket\AttachmentRetention;

use Staff;
use Ticket;
use TicketThread;

final class Utils
{
    public static function deleteAttachments(Ticket $ticket): bool
    {
        /** @var Staff|null $thisstaff */
        global $thisstaff;

        /** @var TicketThread $thread */
        $thread = $ticket->getThread();
        $deleted = $thread->deleteAttachments();

        if ($deleted === 0) {
            return false;
        }

        $name = $thisstaff->getName() ?? __('system task');
        $ticket->logActivity(
            __('Ticket Attachments Deleted'),
            sprintf(__('Ticket attachments deleted by %s'), $name),
        );

        return true;
    }
}