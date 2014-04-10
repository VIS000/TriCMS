<?php
include_once 'global.php';

$Pages = Core::$DB->query('SELECT * FROM cms_news ORDER BY id DESC LIMIT 0,3');

while($a = $Pages->fetchArray())
{
	if(isset($a))
	{
	echo '<div class="promo-container" style="display: none; background-image: url(http://localhost/web-gallery/images/top-story/'.$a['image'].')">

            <div class="promo-content-container">

                <div class="promo-content">

                    <div class="title">'.$a['title'].'</div>

                    <div class="body">
					'.$a['shortstory'].'
                </div>

            </div>

            <div class="promo-link-container">
                    <div class="enter-hotel-btn">
                        <div class="open enter-btn">
                            <a style="padding: 0 8px 0 19px;" href="/articles/'.$a['id'].'">Lees meer</a><b></b>
                        </div>
                    </div>
            </div>


        </div></div>';
	}
	else
	{
		echo '<div class="promo-container" style="display: none; background-image: url(http://localhost/web-gallery/images/top-story/)">

            <div class="promo-content-container">

                <div class="promo-content">

                    <div class="title">Laden</div>

                    <div class="body">
					Eventjes geduld....
                </div>

            </div>

            <div class="promo-link-container">
                    <div class="enter-hotel-btn">
                        <div class="open enter-btn">
                            <a style="padding: 0 8px 0 19px;" href="#">.....</a><b></b>
                        </div>
                    </div>
            </div>


        </div></div>';
	}
}