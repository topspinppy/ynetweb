<div id="myCarousel" class="carousel slide " data-ride="carousel">
		    <!-- Indicators -->
		    <ol class="carousel-indicators">
		      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		      <li data-target="#myCarousel" data-slide-to="1"></li>
		      <li data-target="#myCarousel" data-slide-to="2"></li>
		      <li data-target="#myCarousel" data-slide-to="3"></li>
		    </ol>

		    <!-- Wrapper for slides -->
		    <div class="carousel-inner" role="listbox">
					<?php

						$sqli = "SELECT * FROM slideshow WHERE slide_status = '0'";
						$rs = mysqli_query($connect, $sqli);
						while ($resultz=mysqli_fetch_array($rs,MYSQLI_ASSOC))
						{
								$sqlslide = "SELECT MIN(slide_key) as bc FROM slideshow";
								$rst = mysqli_query($connect, $sqlslide);
								$resulta=mysqli_fetch_array($rst,MYSQLI_ASSOC);
					?>
		      <div class="item <?php if($resultz['slide_key'] == $resulta['bc']) { echo "active"; } else { echo " "; } ?> ">
		        <center><img class="img-responsive" src="./img/slide/<?php echo $resultz['slide_file']; ?>" alt="Chania" width="1400" height="420"></center>
		      </div>
					<?php
						}
					?>
		    </div>
		    <!-- Left and right controls -->
		    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		      <span class="sr-only">Previous</span>
		    </a>
		    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		      <span class="sr-only">Next</span>
		    </a>
		  </div>
