<?php
class Message
{
    /**
    * フォーマットメッセージを表示
    * @param string $mes_h2
    * @param string $mes_p
    * @param string $mes_a
    * @return void
    */
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
