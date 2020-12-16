def factors(numb):
	facs = []
    for i in range(1,int(numb // 2)):
        if numb % i == 0:
        facs.append(i)
return facs