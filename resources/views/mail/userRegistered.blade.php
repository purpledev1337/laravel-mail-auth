Dear {{ $user -> name }},<br>

Please confirm your email by clicking this <b><a href="{{ route('mail.validate', $user -> id) }}">link</a></b><br>

Sincerely,<br>
<b>Videogames.DB Staff</b>