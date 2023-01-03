<?php
/** 
 * Classe d'accès aux données. 
 
 * Utilise les services de la classe PDO
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de articles PDO 
 * $monPdoGsb qui contiendra l'unique instance de la classe
 *
 * @package default
 * @author User Imakhlaf
 * @version    1.0
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */

class PdoUser
{   		
    private static $serveur='mysql:host=localhost';
    private static $bdd='dbname=user_manager';   		
    private static $user='root' ;    		
    private static $mdp='' ;	
	private static $monPdo;
	private static $monPdoUser = null;

/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
        private function __construct()
        {
            PdoUser::$monPdo = new PDO(PdoUser::$serveur.';'.PdoUser::$bdd, PdoUser::$user, PdoUser::$mdp); 
            PdoUser::$monPdo->query("SET CHARACTER SET utf8");
        }
        public function _destruct() {
            PdoUser::$monPdo = null;
        }
/**
 * Fonction statique qui crée l'unique instance de la classe
 *
 * Appel : $instancePdoHtAuto = PdoHtAuto::getPdoHtAuto();
 * @return l'unique objet de la classe PdoHtAuto
 */

        public  static function getPdoUser()
        {
            if (PdoUser::$monPdoUser == null) {
                PdoUser::$monPdoUser = new PdoUser();
            }
            return PdoUser::$monPdoUser;  
        }


        public function login($email, $password) 
        {
            $password = hash('sha256', $password);     
            
            $req = "SELECT email,password from users where email = UPPER(:email) and password = :password and admin = 1";
            $res =  self::$monPdo->prepare($req);
            $res->bindvalue(':email', $email);
            $res->bindvalue(':password', $password);
            $res->execute();
            $ligne = $res->fetch(); 
            return $ligne;
        }   

        public function createAdmin($email, $password) 
        {
            $password = hash('sha256', $password);     
            $req = "INSERT into users VALUES(null, UPPER(:email), :password, null, null, null, null, null , :admin)";
            $res =  self::$monPdo->prepare($req);
            $res->bindvalue(':email', $email);
            $res->bindvalue(':password', $password);
            $res->bindvalue(':admin', 1); // ADMIN
            $res->execute();
            $ligne = $res->fetch(); 
        
            return $ligne;
        }
        
        public function createUser($email, $password, $firstName, $lastName, $adress, $postalCode, $city) 
        {
            $password = hash('sha256', $password);     
            $req = "INSERT into users VALUES(null, UPPER(:email), :password, :firstName, 
            :lastName, :adress, :postalCode, :city , :admin)";
            $res =  self::$monPdo->prepare($req);
            $res->bindvalue(':email', $email);
            $res->bindvalue(':password', $password);
            $res->bindvalue(':firstName', $firstName);
            $res->bindvalue(':lastName', $lastName);
            $res->bindvalue(':adress', $adress);
            $res->bindvalue(':postalCode', $postalCode);
            $res->bindvalue(':city', $city);
            $res->bindvalue(':admin', 0); // user
            $res->execute();
            $ligne = $res->fetch(); 
        
            return $ligne;
        }

        public function getUsers() 
        {
            $req = "SELECT * FROM users WHERE admin = 0";

            $res =  self::$monPdo->query($req);
                
            $lignes = $res->fetchAll(PDO::FETCH_ASSOC); 
    
            return $lignes; 
        }

        public function deleteUser($id) 
        {
            $req = "DELETE FROM users WHERE id = :id";
            $res =  self::$monPdo->prepare($req);
            $res->bindvalue(':id', $id, PDO::PARAM_INT);
            $res->execute();
            $ligne = $res->fetch(); 
        
            return $ligne;
        }

        public function updateUser($firstName, $lastName, $adress, $postalCode, $city, $id)
        {
            $req = "UPDATE users SET firstName = :firstName, lastName = :lastName, adress= :adress, 
            postalCode = :postalCode, city = :city WHERE id = :id";
            $res = self::$monPdo->prepare($req);
            $res->bindvalue(':id', $id, PDO::PARAM_INT);
        
            $res->bindvalue(':firstName', $firstName);
            $res->bindvalue(':lastName', $lastName);
            $res->bindvalue(':adress', $adress);
            $res->bindvalue(':postalCode', $postalCode);
            $res->bindvalue(':city', $city);
            $res->execute();
            $ligne = $res->fetch();

            return $ligne;
        }

}