<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $actionText }}</title>
</head>

<body style="margin: 0; padding: 0; background-color: #1A4D2E;">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
        <tr>
            <td align="center" valign="top" style="padding: 40px 0;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%"
                    style="background-color: #F5EFE6; border-radius: 10px;">
                    <!-- Konten Email -->
                    <tr>
                        <td align="center" style="padding: 40px;">
                            {{-- Greeting --}}
                            @if (!empty($greeting))
                                <h1 style="font-size: 32px; margin-bottom: 20px; color: #1A4D2E;">{{ $greeting }}
                                </h1>
                            @else
                                @if ($level === 'error')
                                    <h1 style="font-size: 32px; margin-bottom: 20px; color: #1A4D2E;">Whoops!</h1>
                                @else
                                    <h1 style="font-size: 32px; margin-bottom: 20px; color: #1A4D2E;">Holla penghuni
                                        D'KOST! 😎🤩</h1>
                                @endif
                            @endif

                            {{-- Intro Lines --}}
                            @foreach ($introLines as $line)
                                <p style="margin-bottom: 15px; color: #4F6F52;">Terima kasih telah mendaftar! Untuk
                                    menyelesaikan proses pendaftaran, klik tombol di bawah.</p>
                            @endforeach

                            {{-- Action Button --}}
                            @isset($actionText)
                                <p style="text-align: center;"><a href="{{ $actionUrl }}"
                                        style="display: inline-block; padding: 10px 20px; background-color: #1A4D2E; color: #fff; text-decoration: none; border-radius: 5px;">Verifikasi
                                        Email</a></p>
                            @endisset

                            {{-- Outro Lines --}}
                            @foreach ($outroLines as $line)
                                <p style="margin-top: 15px; margin-bottom: 20px; color: #4F6F52;">Jika Anda tidak
                                    membuat akun, Anda tidak perlu melakukan tindakan lebih lanjut.</p>
                            @endforeach

                            {{-- Salutation --}}
                            @if (!empty($salutation))
                                <p>{{ $salutation }}</p>
                            @else
                                <p>Terima kasih,<br>D'KOST</p>
                            @endif

                            {{-- Subcopy --}}
                            @isset($actionText)
                                <p style="font-size: 12px; text-align: center; margin-top: 20px;">Jika mengalami kesulitan
                                    dalam mengklik tombol di atas, salin dan tempel URL berikut ke browser web Anda:<br><a
                                        href="{{ $actionUrl }}"
                                        style="word-break: break-all; color: #1A4D2E;">{{ $actionUrl }}</a></p>
                            @endisset
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>