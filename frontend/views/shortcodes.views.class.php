<?php
class CPQA_Shortcodes_Views {

    function q_a( $data ) {
        $qa = $data['qa'];
        ob_start();
        switch( $data['type'] ) {

            case 'form':
?>
    <form id="cpqa_q_and_a_form">
    <div id="cpqa_q_and_a" class="cpqa_q_and_a_form incomplete">
        <?php foreach( $qa as $i => $qa ) { ?>
        <h5 id="q-<?php echo $qa->ID; ?>-title" data-qid="<?php echo $qa->ID; ?>">
            <span>Q<?php echo $i + 1; ?>. <?php echo $qa->post_title; ?></span>
            <div class="cpqa_form_elem">
                <input id="q<?php echo $qa->ID; ?>_yes" class="required" type="radio" value="1" name="q_<?php echo $qa->ID; ?>" />
                <label for="q<?php echo $qa->ID; ?>_yes">Yes</label> /
                <input id="q<?php echo $qa->ID; ?>_no" class="required" type="radio" value="0" name="q_<?php echo $qa->ID; ?>" />
                <label for="q<?php echo $qa->ID; ?>_no">No</label>
            </div>
        </h5>
        <?php } ?>
    </div>
    <button class="cpqa_submit" id="cpqa_q_and_a_submit">Submit answers</button>
    <button class="cpqa_submit" id="cpqa_q_and_a_reset" style="display:none;">Reset and resubmit answers</button>
    <div class="cpqa-loader cpqa-form-loader"></div>
    </div>
<?php
            break;
            case 'plain':
?>
    <div id="cpqa_q_and_a" class="cpqa_q_and_a_plain complete">
        <?php foreach( $qa as $i => $qa ) { ?>
        <h5><span>Q<?php echo $i + 1; ?>. <?php echo $qa->post_title; ?></span></h5>
        <div>
            <div class="q-a-body">
                <?php echo wpautop( $qa->post_content ); ?>
            </div>
        </div>
        <?php } ?>
    </div>
<?php
            break;
        }

        return ob_get_clean();

    }

}
?>
