<?php
/**
 * C L A S S    F I L E
 * 
 */
/**
 * 
 * @author Carlo Tasca
 */
class CodaBubble
{
   /**
    * To hold path to images for a bubble object
    * 
    * e.g. 'images/bubble'
    *
    * @var string
    */
   private $bubbleImagesPath = '';
   /**
    * To hold widths of bubble objects
    * 
    * Format: javascript array
    *
    * @var string
    */
   private $bubbleWidths;
   /**
    * To hold pop up times for each bubble object
    * 
    * Format: javascript array
    *
    * @var string
    */
   private $bubbleTimes;
   /**
    * To hold set up option for microsoft Internet explorer fix
    * 
    * When set to true (default) png images are replaced by .gif images
    * to deal with black border that would appear otherwise around each bubble
    * 
    * Value is a boolean but for javascript object opts{}. Type is string here
    *
    * @var string
    */
   private $msieFix = 'true';
   /**
    * To hold the distances of bubble object from their trigger elements
    * 
    * Format: javascript array
    *
    * @var string
    */
   private $distancesFromTrigger = '[0]';
   /**
    * To hold left shifts for bubble objects
    * 
    * Format: javascript array
    *
    * @var string
    */
   private $leftShifts = '[30]';
   /**
    * To hold hide delays (in seconds) for each bubble object
    * 
    * Format: javascript array
    *
    * @var string
    */
   private $bubbleHideDelays = '[0]';
   /**
    * To hold html for each trigger element created by makeBubble method calls
    * 
    * trigger elements need to have html class attribute set to 'trigger'
    *
    * @var string
    */
   private $triggerElement;
   /**
    * To hold the text for a bubble object
    *
    * @var string
    */
   private $bubbleText;
   /**
    * Contructor for CodaBubble 
    */
   public function __construct ($bubbleImagesPath = null,$bubbleWidths = null, $distancesFromTrigger = '[20]', $leftShifts = '[30]',$bubbleTimes = '[400]',$bubbleHideDelays = '[0]' )
   {
      parent::__construct();
      $this->bubbleImagesPath = $bubbleImagesPath;
      $this->bubbleWidths = $bubbleWidths;
      $this->distancesFromTrigger = $distancesFromTrigger;
      $this->leftShifts = $leftShifts;
      $this->bubbleTimes = $bubbleTimes;
      $this->bubbleHideDelays = $bubbleHideDelays;
   }

   /**
    * @return string
    */
   public function getBubbleText ()
   {
      return $this->bubbleText;
   }

   /**
    * @param string $bubbleText
    */
   public function setBubbleText ($bubbleText)
   {
      $this->bubbleText = $bubbleText;
   }

   /**
    * @return string
    */
   public function getTriggerElement ()
   {
      return $this->triggerElement;
   }

   /**
    * @param string $triggerElement
    */
   public function setTriggerElement ($triggerElement)
   {
      $this->triggerElement = $triggerElement;
   }


   /**
    * @return integer
    */
   public function getBubbleHideDelays ()
   {
      return $this->bubbleHideDelays;
   }

   /**
    * @param integer $bubbleHideDelay
    */
   public function setBubbleHideDelays ($bubbleHideDelays)
   {
      $this->bubbleHideDelays = $bubbleHideDelays;
   }

   /**
    * @return string
    */
   public function getBubbleImagesPath ()
   {
      return $this->bubbleImagesPath;
   }

   /**
    * @param string $bubbleImagesPaths
    */
   public function setBubbleImagesPath ($bubbleImagesPath)
   {
      $this->bubbleImagesPath = $bubbleImagesPath;
   }

   /**
    * @return integer
    */
   public function getBubbleWidths ()
   {
      return $this->bubbleWidths;
   }

   /**
    * @param integer $bubbleWidths
    */
   public function setBubbleWidths ($bubbleWidths)
   {
      $this->bubbleWidths = $bubbleWidths;
   }

   /**
    * @return integer
    */
   public function getDistancesFromTrigger ()
   {
      return $this->distancesFromTrigger;
   }

   /**
    * @param integer $distanceFromTrigger
    */
   public function setDistancesFromTrigger ($distancesFromTrigger)
   {
      $this->distancesFromTrigger = $distancesFromTrigger;
   }

   /**
    * @return string
    */
   public function getLeftShifts ()
   {
      return $this->leftShifts;
   }

   /**
    * @param string $leftShifts
    */
   public function setLeftShifts ($leftShifts)
   {
      $this->leftShifts = $leftShifts;
   }


   /**
    * @return string
    */
   public function getBubbleTimes ()
   {
      return $this->bubbleTimes;
   }

   /**
    * @param string $bubbleTimes
    */
   public function setBubbleTimes ($bubbleTimes)
   {
      $this->bubbleTimes = $bubbleTimes;
   }

   /**
    * @return string
    */
   public function getMsieFix ()
   {
      return $this->msieFix;
   }

   /**
    * @param string $msieFix
    */
   public function setMsieFix ($msieFix)
   {
      $this->msieFix = $msieFix;
   }

   
   /**
    * Returns JQuery code for CodaBubble
    * 
    * Returns javascript for bubble wrapped in jquery document ready function
    * @return string
    */
   function getBubbleJQuery()
   {
      $jqueryCode = "<script type=\"text/javascript\">
$(function () {
  opts = {
      distances : {$this->getDistancesFromTrigger()},
      leftShifts : {$this->getLeftShifts()},
      bubblesTimes : {$this->getBubbleTimes()},
      hideDelays : {$this->getBubbleHideDelays()},
      bubbleWidths : {$this->getBubbleWidths()},
      bubbleImagesPath : '{$this->getBubbleImagesPath()}',
      msieFix : {$this->getMsieFix()}
   };
   $('.coda_bubble').codaBubble(opts);
});
</script>";
      return $jqueryCode;
   }
   /**
    * Returns hml for a bubble
    * 
    * Takes two strings as argument, first is the html for the trigger
    * and second is content for the bubble.
    * 
    * @return string
    */
   function makeBubble()
   {
      $bubble = '<div class="coda_bubble">
        <div>
            ' . $this->getTriggerElement() .  '
        </div>
        <div class="bubble_html">
           ' . $this->getBubbleText() . '
        </div>
    </div>';
      
      return $bubble;
   }
}
?>