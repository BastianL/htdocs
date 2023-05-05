<?php
    class GestionPublic{
        private float $capital;
        private float $taux;
        private float $durée;
        private float $tm;

        public function __construct(float $_capital, float $_taux, float $_durée){
            $this->capital = $_capital;
            $this->taux = $_taux * 0.01;
            $this->durée = $_durée;
            $this->tm = $this->taux / 12;
        }
        public function getCapital(): float
        {
            return $this->capital;
        }
        public function getTaux(): float
        {
            return $this->taux;
        }
        public function getDurée(): float
        {
            return $this->durée;
        }
        public function calculMensualités(): float
        {
            $n=$this->durée * 12;
            $Q = 1-pow((1+ $this->tm),-$n);
            $result = $this->capital * $this->tm / $Q;
            $result = round($result,2);
            return $result;
        }
        public function tableauMensualités(float $mensualité){
            $return = "<thead>
                <th>numero de mois</th>
                <th>Intérêts</th>
                <th>partie Amortissement</th>
                <th>capital restant dû</th>
            </thead>
            <tbody>";
            for($i=$this->capital, $mois = 1; $i > 0; $mois++){
                $intérêts = $i * $this->tm;
                $amortissement = $mensualité - $intérêts;
                if ($amortissement > $i){
                    $amortissement = $i;
                }
                $tr = '<tr><td>' . $mois . '</td><td>' . round($intérêts,2) . '</td><td>' . round($amortissement,2) . '</td><td>' . round($i,2) . '</td>';
                $return = "$return \n $tr";
                $i = $i-$amortissement;
            }
            $return = "$return \n </tbody>";
            return $return;
        }
    }
?>