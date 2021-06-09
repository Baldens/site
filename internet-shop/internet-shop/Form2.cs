using Npgsql;
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace internet_shop
{
    public partial class Form2 : Form
    {
        
        public Form2()
        {
            InitializeComponent();
        }

        private void Form2_Load(object sender, EventArgs e)
        {
            Select();
        }
        private string connectSql = String.Format("Server=localhost;Port=5432;Username=staff_admin;" +
            "Password=staffpass;Database=university_num_one;");
        private NpgsqlConnection connection;
        private string sql;
        private NpgsqlCommand command;
        private DataTable dt;
        private void Select()
        {
            try
            {
                connection = new NpgsqlConnection(connectSql);
                
                connection.Open();

                sql = @"SELECT * FROM goods";
                command = new NpgsqlCommand(sql, connection);
                dt = new DataTable();
                dt.Load(command.ExecuteReader());
                dataGridView1.DataSource = null;
                dataGridView1.DataSource = dt;

                connection.Close();
            }
            catch (Exception ex)
            {
                connection.Close();
                MessageBox.Show("Error" + ex.Message);
            }
        }
    }
}
