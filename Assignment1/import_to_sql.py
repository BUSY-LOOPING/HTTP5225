import csv
import mysql.connector
import os
import traceback

def import_csv_to_mysql(csv_filepath, db_host, db_name, db_user, db_password, table_name):
    try:
        print('Starting connection...')
        mydb = mysql.connector.connect(
            host=db_host,
            database=db_name,
            user=db_user,
            password=db_password,
            use_pure=True
        )
        print('Connected...')

        mycursor = mydb.cursor()

        dirname = os.path.dirname(__file__)
        full_path = os.path.join(dirname, csv_filepath)
        print(f'Opening {full_path}...')
        with open(full_path, 'r', encoding='utf-8') as file: 
            print(f"Opened file: {csv_filepath}...")

            reader = csv.reader(file)
            header = next(reader)

            columns = ['Rating', 'Review', 'Show ID', 'Review ID']
            placeholders = ', '.join(['%s'] * len(columns))
            cols_formatted = ', '.join(f"`{col}`" for col in columns)
            sql = f"INSERT INTO {table_name} ({cols_formatted}) VALUES ({placeholders})"

            inserted_count = 0
            for row in reader:
                if len(row) < 5:
                    print(f"Skipping row due to incorrect number of columns: {row}")
                    continue

                try:
                    rating_int = int(row[1])
                except ValueError:
                    print(f"Skipping row due to invalid integer rating: {row}")
                    continue

                values_to_insert = [rating_int, row[2], row[3], row[4]]

                try:
                    mycursor.execute(sql, tuple(values_to_insert))
                    inserted_count += 1
                except Exception as e:
                    print(f"Error inserting row: {row}. Error: {e}")


        mydb.commit()
        print(f"{inserted_count} records inserted successfully into {table_name}...")

    except mysql.connector.Error as err:
        print(f"MySQL error: {err}")
    except FileNotFoundError:
        print(f"CSV file not found: {csv_filepath}")
    except Exception as e:
        print(f"An unexpected error occurred:")
        traceback.print_exc()
    finally:
        if 'mydb' in locals() and mydb.is_connected():
            mycursor.close()
            mydb.close()


csv_file = 'imdb_tvshows.csv' 
db_host = "localhost"
db_name = "imdb"
db_user = "dhruv"
db_password = "1234"
table_name = "reviews"

import_csv_to_mysql(csv_file, db_host, db_name, db_user, db_password, table_name)
