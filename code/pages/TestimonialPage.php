<?php

class TestimonialPage extends Page {

    public function Testimonials() {
        return Testimonial::get("Testimonial", array("Approved" => 1))->sort("SortOrder");
    }

}

class TestimonialPage_Controller extends Page_Controller {
    
}
