class Student:
    def __init__(self, ID, fName, lName, Email, Passwd, JoinYear, Dept, About):
            self.ID = ID
            self.fName = fName
            self.lName = lName
            self.Email = Email
            self.Passwd = Passwd
            self.JoinYear = JoinYear
            self.Dept = Dept
            self.About = About

    def display(self):
        print str(self.ID) + " "+ self.fName + " "+ self.Email+" "+self.Dept+" "+str(self.JoinYear )

    def returnCSV(self):
        return "'" + (str(self.ID))+ "'" + "," + "'" +self.fName +"'" + ","+"'" +self.lName +"'" + ","+ "'"+self.Email+"'"+","+"'"+self.Passwd+"'" + "," + "'" + (str(self.JoinYear))+"'"+","+"'"+self.Dept+"'"+","+"'"+self.About+"'"

    def returnSQL(self):
        return "INSERT INTO @table VALUES("+ self.returnCSV() +");"


import random
namesF = open("C:/xampp/htdocs/CourseMatch/Course-Match/Data/Names.txt")
deptsF = open("C:/xampp/htdocs/CourseMatch/Course-Match/Data/Departments.txt")

names = namesF.readlines()
fNames = [40]
lNames = [40]

for i in range(0, 40):
    names[i] = names[i].strip('\n')
    print names[i] + " "+str(i)

for i in range(0,40):
#    print names[i]
    fNames.append(names[i].split(' ')[0])
    lNames.append(names[i].split(' ')[1])

depts = deptsF.readlines()

for i in range(0,13):
    depts[i] = depts[i].strip('\n')

Startid = 1221

std = []

for i in range(0, 40):
    Startid = Startid + 1
    ID = Startid
    fName = fNames[i]
    lName = lNames[i]
    Email = names[i].split(' ')[0]+names[i].split(' ')[1]+"@univ.edu.in"
    Passwd = names[i].split(' ')[0]+"@"+names[i].split(' ')[1]
    JoinYear = random.randint(2012,2016)
    Dept = depts[random.randint(0,12)]
    About = "Me"
    st = Student(ID, fName, lName,Email, Passwd, JoinYear, Dept, About)
    std.append(st)
    
stdFile = open('studentDetailsSQL', 'w')

for i in range(0,40):
    stdFile.writelines(std[i].returnSQL()+"\n")

stdFile.close()







    
