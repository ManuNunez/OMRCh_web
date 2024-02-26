import re
import sys

def validar_curp(curp):
    patron_curp = r'^[A-Z]{4}\d{6}[HM]{1}[A-Z]{5}\d{2}$'
    
    if re.match(patron_curp, curp):
        return "True"
    else:
        return "False"

if __name__ == "__main__":
    curp = sys.argv[1]
    print(validar_curp(curp))
