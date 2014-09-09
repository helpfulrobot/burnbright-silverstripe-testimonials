<?php

class TestimonialWidget extends Widget {

    private static $db      = array(
        "BtnText" => "VarChar(120)"
    );
    private static $has_one = array(
        "MoreLink" => "Page"
    );

    public function Title() {
        return $this->WidgetLabel;
    }

    public function Testimonials() {
        Requirements::javascript(FRAMEWORK_DIR . '/thirdparty/jquery/jquery.js');
        Requirements::javascript("silverstripe-testimonials/javascript/jquery.anyslider.min.js");
        Requirements::javascript("silverstripe-testimonials/javascript/main.js");

        return Testimonial::get("Testimonial", array("Approved" => 1), "RAND()");
    }

    public function getCMSFields() {
        $fields = parent::getCMSFields();

        $fields->addFieldToTab("Root.Main", new TextField('WidgetLabel', 'Widget Label'), "Enabled");
        $fields->addFieldToTab("Root.Main", new TextField('WidgetName', 'Widget Name'), "Enabled");
        $fields->addFieldToTab("Root.Main", new TextField('WidgetName', 'Widget Name'), "Enabled");
        $fields->addFieldToTab('Root.Main', new TextField('BtnText', 'Button label'));
        $fields->addFieldToTab('Root.Main', new TreeDropdownField("MoreLinkID", "Button link", "SiteTree"));


        return $fields;
    }

}
