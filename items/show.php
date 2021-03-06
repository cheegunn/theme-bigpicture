<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'item show')); ?>

<?php
  $title = metadata('item', array('Dublin Core', 'Title'));
  $subject = metadata('item', array('Dublin Core', 'Subject'));
  $description = metadata('item', array('Dublin Core', 'Description'));
  $creators = metadata('item', array('Dublin Core', 'Creator'));
  $source = metadata('item', array('Dublin Core', 'Source'));
  $publisher = metadata('item', array('Dublin Core', 'Publisher'));
  $date = metadata('item', array('Dublin Core', 'Date'));
  $contributors = metadata('item', array('Dublin Core', 'Contributor'));
  $rights = metadata('item', array('Dublin Core', 'Rights'));
  $relation = metadata('item', array('Dublin Core', 'Relation'));
  $format = metadata('item', array('Dublin Core', 'Format'));
  $language = metadata('item', array('Dublin Core', 'Language'));
  $type = metadata('item', array('Dublin Core', 'Type'));
  $identifier = metadata('item', array('Dublin Core', 'Identifier'));
  $coverage = metadata('item', array('Dublin Core', 'Coverage'));
  $tags = tag_string('item', 'items/browse', '');
  $citation = metadata('item', 'citation', array('no_escape' => true));
  $collection = link_to_collection_for_item();
  $outputFormat = output_format_list(false, '');

  function showItemDescriptionTag($tagName, $tagVal) {
    echo __('<div class="item-description-tag">');
    echo __('  <h1>'.$tagName.'</h1>');
    if ($tagName == 'TITLE') {
      echo __('  <b>'.$tagVal.'</b>');
    } else {
      echo __('  <p>'.$tagVal.'</p>');
    }
    echo __('</div>');
  }
?>
<div class="container item">
  <div class="section-header col-md-8 col-md-offset-2">
    <small>-ITEM-</small>
    <h1><?php echo $title ?></h1>
  </div><!-- end of section-header -->


      
  <?php 
    if (get_theme_option('Item FileGallery') == 0 && metadata('item', 'has files')) {
      if (metadata('item', 'file_count') > 1) {
        echo __('<div class="multi-item-files col-lg-8 col-lg-offset-2 col-md-12">');
        echo files_for_item(array('imageSize' => 'square_thumbnail'), array('class' => 'item-file col-md-6'));
      } else {
        echo __('<div class="single-item-files col-lg-8 col-lg-offset-2 col-md-12">');
        echo files_for_item(array('imageSize' => 'fullsize'));
      }
      echo __('</div><!-- end of item-files -->'); 
    }
  
  ?>
  

  <div class="item-description col-lg-12">
    <div class="col-lg-2 col-md-3 col-sm-6 col-lg-offset-2">
      <?php 
        showItemDescriptionTag('NAME', $title); 
    	showItemDescriptionTag('CONTENTS', $subject);

      ?>
    </div>

    <div class="col-lg-2 col-md-3 col-sm-6">
      <?php 
        showItemDescriptionTag('LOCATION', $source); 
        showItemDescriptionTag('PHYSICAL ACCESS', $rights);
      ?>
    </div>
    
    <div class="col-lg-2 col-md-3 col-sm-6">
      <?php 
         
        showItemDescriptionTag('ONLINE ACCESS', $format);
        showItemDescriptionTag('WEBSITE', $publisher); 
      ?>
    </div>

    <div class="col-lg-2 col-md-3 col-sm-6">
      <?php 
              showItemDescriptionTag('TYPE', $type);
              showItemDescriptionTag('LANGUAGE', $language);

      ?>
    </div>
    
  </div><!-- end of item-description -->
</div><!-- end of item container -->

<?php echo foot(); ?>
