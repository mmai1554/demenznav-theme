/**
 * Created by mmai on the birthday of the flying spagetthi monster
 */
jQuery(document).ready(function($) {
    alert('hi');
    function mapHighlight(key){
        document.getElementById('shmap').classList.add(key);
        document.getElementById('legende_'+key).classList.add('highlight');
    }
    function mapReset(key){
        document.getElementById('shmap').classList.remove(key);
        document.getElementById('legende_'+key).classList.remove('highlight');
    }
});