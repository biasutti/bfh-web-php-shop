<?php
if(!isset($_COOKIE['eucookie']))
{ ?>
    <div class="my-cookie-container">
        <div class="my-cookie-law flex-container">
            <div class="flex-item-1 flex-size-4">
                By browsing our site you agree to our use of cookies. You will only see this message once. <a href="#" id="more">Find out more</a>
            </div>
            <div class="flex-item-2 flex-size-1">
                <button class="flex-item-2"><?php echo t('acceptCookie'); ?></button>
            </div>
        </div>
    </div>
<?php
}