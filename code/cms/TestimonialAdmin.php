<?php

class TestimonialAdmin extends ModelAdmin {

    private static $managed_models = array("Testimonial");
    private static $url_segment    = "Testimonials";
    private static $menu_title     = "Testimonials";

    public function getEditForm($id = null, $fields = null) {
        $form      = parent::getEditForm($id, $fields);
        $gridField = $form->Fields()->dataFieldByName($this->sanitiseClassName($this->modelClass));
        //This check is simply to ensure you are on the managed model you want adjust accordingly
        if ($this->modelClass == 'Testimonial' && $gridField) {
            //This is just a precaution to ensure we got a GridField from dataFieldByName() which you should have
            if ($gridField instanceof GridField) {
                $gridField->getConfig()->addComponent(new GridFieldSortableRows('SortOrder'));
            }
        }

        return $form;
    }

}
