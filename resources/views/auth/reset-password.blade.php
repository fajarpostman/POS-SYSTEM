<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h1>Reset Password</h1>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        
        <div>
            <label for="email">Email</label>
            <input id="email" type="email" name="email" required>
        </div>
        
        <div>
            <label for="password">New Password</label>
            <input id="password" type="password" name="password" required>
        </div>
        
        <div>
            <button type="submit">Reset Password</button>
        </div>
    </form>
</body>
</html>
