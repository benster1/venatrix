from flask import Flask, render_template, request, redirect, url_for
import requests
import json
from sqldata import TesterData


application = Flask(__name__)


@application.route('/')
def Index():
    return(render_template('index.html'))

@application.route('/', methods = ['POST'])
def Welcome():
    firstname = request.form['field1']
    lastname = request.form["field2"]
    email = request.form['field3']
    phone = request.form['field4']
    company = request.form["field5"]
    
    phoneN = ''
    name = firstname + "-" + lastname
    for i in phone:
        if i != "-": #or  or 
            if i != '(':
                if i != ')':
                    phoneN += str(i)
    
    data = TesterData(name, company, email, phoneN)
    data.InsertSQLData()
    return(redirect(url_for('Index')))


if __name__ == "__main__":
    application.run(debug=True)