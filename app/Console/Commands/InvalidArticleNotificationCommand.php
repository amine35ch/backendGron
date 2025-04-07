<?php

namespace App\Console\Commands;

use App\Enums\DArticleEnum\DArticleType;
use App\Models\DArticle;
use Illuminate\Console\Command;

class InvalidArticleNotificationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:validate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dArticles=DArticle::where('is_validated',0)->whereIn('type',[DArticleType::PRODUCT->value,DArticleType::SERVICE->value])->with('company')->get();
        foreach ($dArticles as $dArticle) {

            $message='Le produit '.__('notifications.article.Invalid',[
                'article'=>$dArticle->designation,
            ]);
            $subject='Validation Produit';
            if ($dArticle->type==DArticleType::SERVICE->value) {
                $subject='Validation Prestation';
                $message= 'la prestation '.__('notifications.article.Invalid',[
                'article'=>$dArticle->designation,
            ]);
            }
            sendNotificationCompany(
                $subject,
                $message,
                null,
                $dArticle->mar
            );
        }
    }
}
