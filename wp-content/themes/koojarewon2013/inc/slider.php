<?php if (isset($slides['image']) AND sizeof($slides['image'])) : ?>
    <div id="sliderarea">
        <div id="slidernav">
            <a href="#" id="sliderprev">Prev</a>
            <a href="#" id="slidernext">Next</a>
        </div>
        <ul id="slider">
        <?php
            foreach ($slides['image'] AS $index=>$slideImage) :
                $slideThumbnail = isset($slides['thumbnail'][$index]) ? $slides['thumbnail'][$index] : '';
                $slideHeading = isset($slides['heading'][$index]) ? $slides['heading'][$index] : '';
                $slideDescription = isset($slides['description'][$index]) ? $slides['description'][$index] : '';
                $slideLink = isset($slides['link'][$index]) ? $slides['link'][$index] : '';
                if ($slideLink=='URL') $slideLink = '';
        ?>
            <li style="background-image:url(<?php echo $slideImage?>);">
            <?php if ((!empty($slideHeading) AND $slideHeading!='Heading') OR (!empty($slideDescription) AND $slideDescription!='Description')) : ?>
                <div class="overlay">
                    <div class="pad">
                        <?php echo (!empty($slideHeading) AND $slideHeading!='Heading') ? "<h2>$slideHeading</h2>" : '' ?>
                        <?php echo (!empty($slideDescription) AND $slideDescription!='Description') ? "$slideDescription" : '' ?>
                        <?php if (!empty($slideLink)) : ?>
                            <a href="<?php echo $slideLink?>">Read more &raquo;</a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
            </li>
        <?php endforeach; ?>
        </ul><!-- #slider -->
    </div><!-- #sliderarea -->
<?php endif; ?>