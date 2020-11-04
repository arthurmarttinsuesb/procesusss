<html>
    <body>
        @if ($mensagem->id_user_destinatario == null)
            <p>Olá!</p>
        @else
            <p>Olá {{ $mensagem->usuario->name }}!</p>
        @endif
        <p></p>
        <p><?php echo $mensagem->mensagem ?></p>
        <p></p>
        <p>Att, <br>
            Processus<br>
            Mensagem enviada automáticamente, por favor não responda.</p>
    </body>
</html>