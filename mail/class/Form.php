<?php
class Form{

    private $datas = [];

    public function __construct($datas = []){
        $this->datas = $datas;
    }

    private function input($type, $name, $label){
        $value = $this->getValue($name);

        if($type == 'textarea'){
        $input = "<textarea name=\"$name\" id=\"$name\" rows=\"10\" class=\"form-control\" required >$value</textarea>";
        }else{
            $input = "<input type=\"$type\" name=\"$name\" id=\"$name\" class=\"form-control\" value=\"$value\" required >";
        }

        return "<div class=\"form-group\">
             <label for=\"$name\">$label</label>
             $input
         </div>";
    }

    private function getValue($name){
        $value = "";
        if(isset($this->datas[$name])){
            return $this->datas[$name];
        }else{
            return "";
        }
    }

    public function text($name, $label){
       return $this->input('text', $name, $label);
    }

    public function email($name, $label){
        return $this->input('email', $name, $label);
    }

    public function textarea($name, $label){
        return $this->input('textarea', $name, $label);
    }
    /*
    Pour utiliser un select afin d'envoyer des mails à plusieur service
    utiliser la function select sur le formulaire :
    <?= $form->select('select', 'service', ['contact', 'général' ]); ?>
    et dans le post_contact.php : 
    $emails = ['contact@local.dev', 'général@local.dev'];
    */
    public function select($name, $label, $options){
        $options_html = "";
        $value = $this->getValue($name);
        foreach ($options as $k => $v){
            $selected = "";
            if($value == $k){
                $selected = "selected";
            }
            $options_html .= "<option value = \"$k\" $selected>$v</option>";
        }
        return "<div class=\"form-group\">
             <label for=\"$name\">$label</label>
             <select name=\"$name\" id=\"$name\" class=\"form-control\">$options_html </select>
         </div>";
    }


    public function submit($label){
        return "<button type=\"submit\" class=\"btn btn-primary\">$label</button>";

    }
}