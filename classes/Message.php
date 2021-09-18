<?php
class Message
{
    public static function putMes($mes_h2, $mes_p, $mes_a)
    {
        $mes_format = <<< EOM
        <div class="message">
            <h2>$mes_h2</h2>
            <p>$mes_p</p>
            $mes_a
          </div>
          <style>
          body{
            background: #eee;
          }
          .message{
            margin: 260px auto;
            width: 45%;
            background: #fff;
            padding: 0 0 20px;
          }
          .message > *{
            padding: 0 40px;
          }
          .message h2{
            font-weight: 200;
            background: #ff7052;
            color: #fff;
            padding: 15px;
            font-size: 20px;
          }
        </style>
        EOM;
        echo $mes_format;
    }
}
