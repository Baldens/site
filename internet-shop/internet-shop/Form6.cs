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
    public partial class Form6 : Form
    {
        public Form6(Form3 main)
        {
            InitializeComponent();
            this.Owner = main;
        }
        private string connectSql = String.Format("Server=localhost;Port=5432;Username=postgres;" +
            "Password=admin;Database=university_num_one;");
        private NpgsqlConnection connection;
        
        private void Button1_Click(object sender, EventArgs e)
        {
            NpgsqlCommand cmd = connection.CreateCommand();
            string a = String.Format("UPDATE orders SET date_finish=\'{0}\',  finish_cost=\'{1}\', users=\'{2}\', id_goods=\'{3}\', counts=\'{4}\' " +
                "WHERE \"ID_order\"=\'{5}\'", 
                textBox2.Text, textBox6.Text, textBox3.Text, textBox4.Text, textBox5.Text, textBox1.Text);
            cmd.CommandText = a;
            connection.Open();
            cmd.ExecuteNonQuery();
            connection.Close();

            ((Form3)this.Owner).refreshData();
            this.Close();
        }

        private void Form6_Load(object sender, EventArgs e)
        {
            
            connection = new NpgsqlConnection(connectSql);
        }
    }
}
