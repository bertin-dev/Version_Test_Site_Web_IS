<div class="row clearfix">
<div class="col-md-12">	
<div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
<div class="media">

<center><h5> <u>Cours Ecrit A Télécharger</u></h5></center>

<?php

$list2=$bdd->prepare('SELECT * FROM actualite WHERE pdf!="" OR docX!="" ');
$list2->execute();

while($list2_cours=$list2->fetch())
{

if(isset($list2_cours['pdf']) AND !empty($list2_cours['pdf']))
{
?>
  <center> <h5> <?php echo $list2_cours['titre'];?> </h5>
<a href="<?php echo $list2_cours['pdf'];?>" title=""> <img src="images/pdf.gif" alt="cours en PDF"/> </a>
</center>
<?php
}
echo '<hr>';

if(isset($list2_cours['docX']) AND !empty($list2_cours['docX']))
{
?>
  <center> <h5> <?php echo $list2_cours['titre'];?> </h5>
<a href="<?php echo $list2_cours['docX'];?>" title=""> <img src="images/word.gif" alt="cours en PDF"/> </a>
</center>
<?php
}

}
?>
</div>
</div>
</div>
</div>


<div class="row team-bar col-md-offset-1">
					<div class="first-one-arrow hidden-xs">
						<hr>
					</div>
					<div class="first-arrow hidden-xs">
						<hr> <i class="fa fa-angle-up"></i>
					</div>
					
					<div class="fourth-arrow hidden-xs">
						<hr> <i class="fa fa-angle-down"></i>
					</div>	
			</div>




<center><h2><u>Vidéos les Plus vues</u></h2></center>
<div class="row clearfix">
<div class="col-md-12">	
<div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
<div class="media">

<?php

$list1=$bdd->prepare('SELECT * FROM actualite WHERE aime > 5');
$list1->execute();

while($list1_video=$list1->fetch())
{
?>		
  <center><h5><u><strong><?php echo $list1_video['titre'];?></strong></u></h5></center>;
 <?php
if(isset($list1_video['image']) AND !empty($list1_video['image']))
{
?>
<video src="<?php echo $list1_video['image'];?>" controls poster="images/Formateurs/sk.jpg" loop></video>
<?php
}
echo '<hr>';


}
?>
</div>
</div>
</div>
</div>

