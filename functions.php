<?php


class functions
{
    public static $private_directory="private";
    public static function homeBanner ($subHeader1,$link1){
        echo "<!--================Home Banner Area =================-->
        <section class=\"banner_area\">
            <div class=\"box_1620\">
				<div class=\"banner_inner d-flex align-items-center\">
					<div class=\"container\">
						<div class=\"banner_content text-center\">
							<h2>$subHeader1</h2>
							<div class=\"page_link\">
								<a href=\"index.php\">Home</a>
								<a href=\"$link1\">$subHeader1</a>
							</div>
						</div>
					</div>
				</div>
            </div>
        </section>";
    }
}