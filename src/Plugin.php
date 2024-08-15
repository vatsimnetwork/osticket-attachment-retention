<?php

namespace Vatsim\Osticket\AttachmentRetention;

use Dispatcher;
use Plugin as BasePlugin;
use Signal;
use Ticket;

class Plugin extends BasePlugin
{
    public $config_class = Config::class;

    public function bootstrap(): void
    {
        $this->addActionLink();
        $this->registerRoutes();
    }

    private function addActionLink(): void
    {
        Signal::connect('ticket.view.more', function (Ticket $ticket, &$data) {
            $ticketId = $ticket->getId();
            $text = __('Delete Attachments');
            echo <<<HTML
<li class="danger">
    <a class="ticket-action" href="#attachment-retention/ticket/$ticketId/delete-all" data-redirect="tickets.php?id=$ticketId">
        <i class="icon-folder-close"></i>
        $text
    </a>
</li>
HTML;
        });
    }

    private function registerRoutes(): void
    {
        Signal::connect('ajax.scp', function (Dispatcher $dispatcher, &$data) {
            $dispatcher->append(
                url('^/attachment-retention/ticket/(?P<id>\d+)/delete-all$', new DeleteAllController)
            );
        });
    }
}
