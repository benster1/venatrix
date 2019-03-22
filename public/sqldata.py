import pymysql.cursors
class TesterData():
    def __init__(self, name, company, email, phone):
        self.name = name
        self.company = company
        self.email = email
        self.phone = phone
        self.userID = self.SQLCount() + 1

    def InsertSQLData(self):
        connection = pymysql.connect(
        host = 'aadwoprydkq272.cvo0fimkibyb.us-east-1.rds.amazonaws.com',
        port = 3306,
        user = 'RDS-Test-Service',
        password = 'P@$$w0rd!',
        db = 'db'
        )
        
        try:
            with connection.cursor() as cursor:
                
                sql = "INSERT INTO AlphaTesterData (id, name, company, email, phone)  VALUES (%s, %s, %s, %s, %s)"
                cursor.execute(sql, (self.userID, self.name, self.company, self.email, self.phone))
                

        finally:
            connection.commit()
            connection.close()

        return(0)
    
    def SQLCount(self):
        connection = pymysql.connect(
        host = 'aadwoprydkq272.cvo0fimkibyb.us-east-1.rds.amazonaws.com',
        port = 3306,
        user = 'RDS-Test-Service',
        password = 'P@$$w0rd!',
        db = 'db'
        )
        
        try:
            with connection.cursor() as cursor:
                
                sql = "SELECT COUNT(*) FROM AlphaTesterData"
                cursor.execute(sql)
                result = cursor.fetchone()

        finally:
            connection.commit()
            connection.close()
        count = result[0]
        count = int(count)       
        return(count)
        

