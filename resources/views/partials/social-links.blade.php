<div class="buttons-social-media-share">
    <ul class="share-buttons">
        <li>
            <a href="https://www.facebook.com/sharer.php?u={{ request()->fullUrl() }}"
               title="Compartir en Facebook"
               target="_blank">
                <img
                    alt="Share on Facebook"
                    src="/img/flat_web_icon_set/Facebook.png">
            </a>
        </li>
        <li>
            <a href="https://twitter.com/intent/tweet?url={{ request()->fullUrl() }}&text={{ $description }}&via={{ config('app.name') }}&hashtags={{ config('app.name') }}"
               target="_blank"
               title="Tweet">
                <img alt="Tweet"
                     src="/img/flat_web_icon_set/Twitter.png">
            </a>
        </li>
        <li>
            <a href="https://www.google.com/bookmarks/mark?op=edit&bkmk={{ request()->fullUrl() }}&title={{ $description }}&annotation=blog&labels=blog"
               target="_blank"
               title="Compartir en on Google+">
                <img alt="Share on Google+"
                     src="/img/flat_web_icon_set/Google-plus.png">
            </a>
        </li>
        <li>
            <a href="http://pinterest.com/pin/create/button/?url={{ request()->fullUrl() }}&description={{ $description }}"
               target="_blank"
               title="Pinterest">
                <img alt="Pinterest"
                     src="/img/flat_web_icon_set/Pinterest.png">
            </a>
        </li>
    </ul>
</div>
