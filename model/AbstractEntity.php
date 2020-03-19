<?php
abstract class AbstractEntity{

    public function __construct(array $donnees = null){
        if ($donnees != null){
            $this->hydrate($donnees);
        }
    }

    public function hydrate(array $donnees){
        foreach($donnees as $key => $value){
            $method = 'set' . ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }
/*Ces trois fonction permettent de pouvoir modifier la date directement en les utilisants dans l'objet. 
(source: https://blog.smarchal.com/changer-format-date-php)*/
    public function alter($date, $before, $after) {
		return DateTime::createFromFormat($before, $date)->format($after);
    }
    
	public function toSQL($date, $before = 'd/m/Y') {
		return self::alter($date, $before, 'Y-m-d H:i:s');
    }

	public function toHTML($date, $before = 'Y-m-d H:i:s') {
		return self::alter($date, $before, 'd/m/Y');
    }

    public function toHTMlWithHours($date, $before = 'Y-m-d H:i:s') {
		return self::alter($date, $before, 'd/m/Y à H:i:s' );
    }
    
}