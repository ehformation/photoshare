<?php 
class Helper {
    function calculateLastUpdated($created) {
        $created = new DateTime($created);
        $now = new DateTime();
        $lastUpdated = ''; 

        $diff = $created->diff($now);

        if($diff->m > 0){
            $lastUpdated = $diff->m . ' mois';
        } elseif ($diff->d > 0) {
            $lastUpdated = $diff->d . ' jour(s)';
        } elseif ($diff->h > 0) {
            $lastUpdated = $diff->h . ' heure(s)';
        } elseif ($diff->i > 0) {
            $lastUpdated = $diff->i . ' minute(s)';
        } else{
            $lastUpdated = "A l'instant";
        }

        return $lastUpdated;
    }
}