# 
# Simple file download server v1.3.37
#
import socket
import codecs

HOST = ''
PORT = 5555
s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
s.bind((HOST, PORT))
s.listen(1)

MAGIC_BYTE = '\x41\x53\x54\x23'

def strong_crypto(s):    
    return codecs.encode(s, 'rot_13')

while True:
    conn, addr = s.accept()

    conn.send('Connected to encrypted FileReader. Secure since 44 BC.\n')

    while 1:
        data = conn.recv(1024)

        if not data or data[:4] != MAGIC_BYTE:
            break

        try:
            filename = data[4:-1]
            filename_enc = strong_crypto(filename)

            fhandle = open(filename_enc, 'r')
            conn.sendall(fhandle.read())
        except socket.error, exc:
            # pass on connection error
            pass
        except IOError:
            conn.send('file not found\n')

    conn.close()
