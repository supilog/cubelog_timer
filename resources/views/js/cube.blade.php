<script>
    <?php
    $json_scramble_array = json_encode($scramble);
    ?>
    let js_scramble = <?php echo $json_scramble_array; ?>

    function rolling(roll) {
        // console.log(roll);
        // return;
    }

    for (let i = 0; i < js_scramble.length; i++) {
        rolling(js_scramble[i]);
    }
</script>
