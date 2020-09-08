<?php
class CPQA_REST {

    function __construct() {
        add_action( 'rest_api_init', array( $this, 'routes' ) );
    }

    function routes() {

        $namespace = 'cpqa/v1';

        register_rest_route( $namespace, '/get-answers', array( // This one needs to be in the plugin
            'methods' => WP_REST_Server::CREATABLE,
            'callback' => array( $this, 'get_answers' ),
            'args' => array(
                // 'amount' => array(
                //     'sanitize_callback' => function( $value, $request, $param ) {
                //         return sanitize_text_field( $request['amount'] );
                //     }
                // )
            )
        ) );

    }

    function get_answers( $request ) {

        $params = $request->get_json_params();

        $errors = array();
        if( ! $params['data'] ) {
            $errors[] = '<p>Missing crucial data. Cannot display answers.</p>';
        }

        $questions = array();
        parse_str($params['data'], $questions);

        $answers = array();

        foreach( $questions as $question => $getAnswer ) {
            $qid = explode( '_', $question );
            $qid = $qid['1'];

            if( ! $qid ) continue;

            if( $getAnswer == '1' ) {
                $theQuestion = get_post( intval( $qid ) );
                if( $theQuestion && ! in_array( $qid, $answers ) ) {
                    $answers[ $qid ] = $theQuestion->post_content;
                }
            }
        }

        return new WP_REST_Response( array( 'status' => 'success', 'answers' => $answers ) );

    }

}
