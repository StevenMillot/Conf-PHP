<?PHP

namespace App\Helpers;

class MyHtml {

    public function radio($name, $params = []) {
        $str_params = '';
        foreach ($params as $param => $value)
        {
            $str_params .= $param . '="' . $value . '" ';
        }
        return '<input type="radio" name="' . $name . '" ' . $str_params . '/>';
    }

    public function link($title, $href) {
        return '<a href="' . $href . '">' . $title . '</a>';
    }

    public function thumb($href, $alt = '') {
        if ($href){
            return '<img src="' . url('assets/upload', $href) . '" alt="' . $alt . '-image" class="img-thumbnail" />';
        }
        else{
            return '';
        }

    }
}
