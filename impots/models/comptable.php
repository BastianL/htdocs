<?php

class ComptablePublic{
    private float $revenu;
    private string $nom;
    private float $impot;
    public Const taux1 = 0;
    public Const taux2 = 0.11;
    public Const taux3 = 0.3;
    public Const taux4 = 0.41;
    public Const taux5 = 0.45;
    public Const palier1 = 10777;
    public Const palier2 = 27478;
    public Const palier3 = 78570;
    public Const palier4 = 168994;
    public Const tranche1 = self::palier1 * self::taux1;
    public Const tranche2 = (self::palier2 - self::palier1) * self::taux2;
    public Const tranche3 = (self::palier3 - self::palier2) * self::taux3;
    public Const tranche4 = (self::palier4 - self::palier3) * self::taux4;
    public function __construct(string $_nom, float $_revenu)
    {
        $this->nom = $_nom;
        $this->revenu = round($_revenu,2,PHP_ROUND_HALF_UP);
        $this->impot=0;
    }
    public function getRevenu():float
    {
        return $this->revenu;
    }
    public function getNom():string
    {
        return $this->nom;
    }
    public function setNom(string $_nouveau_nom): void
    {
        $this->nom=$_nouveau_nom;
    }
    public function calculImpot():string
    {
        if($this->revenu <=self::palier1){
            $this->impot = $this->revenu*self::taux1;
        }
        else if ($this->revenu <=self::palier2){
            $this->impot = self::tranche1 + ($this->revenu-self::palier1)*self::taux2;
        }
        else if ($this->revenu <=self::palier3){
            $this->impot = self::tranche1 + self::tranche2 + ($this->revenu-self::palier2)*self::taux3;
        }
        else if ($this->revenu <=self::palier4 ){
            $this->impot = self::tranche1 + self::tranche2 + self::tranche3 + ($this->revenu-self::palier3)*self::taux4;
        }
        else{
            $this->impot = self::tranche1 + self::tranche2 + self::tranche3 + self::tranche4 + ($this->revenu-self::palier4)*self::taux5;
        }
        $chaine="M(e) ".$this->nom." votre impôt sur le revenu est de :  ";
        $this->impot=round($this->impot,2);
        $chaine.=$this->impot." €";
        return $chaine;
    }
}