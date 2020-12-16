
import subprocess
proc = subprocess.Popen("C:/xampp/php/php C:/xampp/htdocs/jendiegovernor/hellow.php", shell = True, stdout = subprocess.PIPE)
script_response = proc.stdout.read()