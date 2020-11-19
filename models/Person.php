<!-- Write your Model code here. You should rename this file. -->
<?php 
require '../utilities/Sanitizer.php';

class Person {

    protected $name;
    protected $age;
    protected $balance;
    protected $image;
    protected $imageFiles = [
        'bmo.png',
        'finn.png',
        'jake.png',
        'lady.png',
        'lsp.png',
        'marcy.png',
        'pb.png',
        'simon.png'
    ];

    public function __construct(array $input) {
        $this->set_name($input['name']);
        $this->set_age($input['age']);
        $this->set_balance($input['balance']);
        $this->set_image($input['image']);
    }

    public function __get($prop) {
        if (property_exists($this, $prop)) {
            return $this->$prop;
        }
    }

    public function set_name(string $temp_name) {
        $this->name = Sanitizer::format_name($temp_name);
    }

    public function set_age(int $temp_age) {
        $this->age = Sanitizer::filter_number($temp_age);
    }

    public function set_balance(int $temp_balance) {
        $this->balance = Sanitizer::filter_number($temp_balance);
    }

    public function set_image(string $temp_image) {
        $this->image = Sanitizer::filter_file($temp_image, $this->imageFiles);

        if (empty($this->image)) {
            $this->image = $this->imageFiles[0];
        }
    }
}