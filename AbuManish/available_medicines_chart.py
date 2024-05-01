import matplotlib.pyplot as plt
import mysql.connector

# Connect to the database
conn = mysql.connector.connect(
    host="localhost",
    user="system",
    password="",
    database="medical"
)
cursor = conn.cursor()

# Fetch data of available medicines
cursor.execute("SELECT medicine_name, available_quantity FROM medicines WHERE expiry_date > CURDATE()")
available_medicines_data = cursor.fetchall()

# Close database connection
cursor.close()
conn.close()

# Prepare data for plotting
medicine_names = [row[0] for row in available_medicines_data]
quantities = [row[1] for row in available_medicines_data]

# Create bar chart
plt.bar(medicine_names, quantities, color='blue')
plt.xlabel('Medicine Name')
plt.ylabel('Available Quantity')
plt.title('Available Medicines Quantity')
plt.xticks(rotation=45, ha='right')
plt.tight_layout()

# Save the plot as a PNG image
plt.savefig('available_medicines_chart.png')
plt.close()
