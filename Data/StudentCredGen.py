class Student:
    def __init__(self, ID, Name, Email, Passwd, JoinYear, Dept, About):
            self.ID = ID
            self.Name = Name
            self.Email = Email
            self.Passwd = Passwd
            self.JoinYear = JoinYear
            self.Dept = Dept
            self.About = About

    def display(self):
        print str(self.ID) + " "+ self.Name + " "+ self.Email+" "+self.Dept+" "+str(self.JoinYear )

    def returnCSV(self):
        return "'" + (str(self.ID))+ "'" + "," + "'" +self.Name +"'" + ","+ "'"+self.Email+"'"+","+"'"+self.Passwd+"'" + "," + "'" + (str(self.JoinYear))+"'"+","+"'"+self.Dept+"'"+","+"'"+self.About+"'"

    def returnSQL(self):
        return "INSERT INTO @table VALUES("+ self.returnCSV() +");"


import random
namesF = open("C:/xampp/htdocs/CourseMatch/Course-Match/Data/Names.txt")
deptsF = open("C:/xampp/htdocs/CourseMatch/Course-Match/Data/Departments.txt")

names = namesF.readlines()
for i in range(0, 40):
    names[i] = names[i].strip('\n')

depts = deptsF.readlines()
for i in range(0,13):
    depts[i] = depts[i].strip('\n')

Startid = 1221

std = []

for i in range(0, 40):
    Startid = Startid + 1
    ID = Startid
    Name = names[i]
    Email = Name.split(' ')[0]+Name.split(' ')[1]+"@univ.edu.in"
    Passwd = Name.split(' ')[0]+"@"+Name.split(' ')[1]
    JoinYear = random.randint(2012,2016)
    Dept = depts[random.randint(0,12)]
    About = "Me"
    st = Student(ID, Name, Email, Passwd, JoinYear, Dept, About)
    std.append(st)
    


    
