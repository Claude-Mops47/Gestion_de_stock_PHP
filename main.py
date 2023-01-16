import matplotlib.pyplot as pyplot

labels = ('Python', 'Java', 'Scala', 'C#')
sizes = [50,30, 10, 20]

pyplot.pie(sizes,labels=labels, autopct='%1.f%%',counterclock=False, startangle=90)

pyplot.show()


# Calculator !!
# print(eval(input("Enter Expression:")))

