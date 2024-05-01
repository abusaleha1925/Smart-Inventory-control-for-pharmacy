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

# Fetch data of expired medicines
cursor.execute("SELECT medicine_name, available_quantity FROM medicines WHERE expiry_date <= CURDATE()")
expired_medicines_data = cursor.fetchall()

# Close database connection
cursor.close()
conn.close()

# Prepare data for plotting
medicine_names = [row[0] for row in expired_medicines_data]
quantities = [row[1] for row in expired_medicines_data]

# Create bar chart
plt.bar(medicine_names, quantities, color='red')
plt.xlabel('Medicine Name')
plt.ylabel('Expired Quantity')
plt.title('Expired Medicines Quantity')
plt.xticks(rotation=45, ha='right')
plt.tight_layout()

# Define the path to save the image
image_path = 'C:\\xampp\\htdocs\\AbuManish\\imag\\chart.jpg'

# Save the plot as a JPG image
plt.savefig(image_path)
plt.close()

# Print the path where the image is saved
print("The image is saved at:", image_path)
