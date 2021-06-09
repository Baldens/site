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
using System.Data.Common;

namespace internet_shop
{
    public partial class Form3 : Form
    {
        private string connectSql = String.Format("Server=localhost;Port=5432;Username=staff_admin;" +
            "Password=staffpass;Database=university_num_one;");
        private NpgsqlConnection connection;
        private string sql;
        private NpgsqlCommand command;
        private DataTable dt;
        public Form3()
        {
            InitializeComponent();
        }

        private void Form3_Load(object sender, EventArgs e)
        {
        connection = new NpgsqlConnection(connectSql);
            Select();
        }
        private void Select()
        {
            try
            {
                connection.Open();




                sql = @"SELECT * FROM orders";
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
                MessageBox.Show("Error"+ex.Message);
            }
        }

        private void DataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }

        private void Button1_Click(object sender, EventArgs e)
        {
            addData();
            Select();
        }
        private void addData()
        {
            NpgsqlCommand cmd = connection.CreateCommand();
            DataTable dt = new DataTable();
            string a = String.Format("INSERT INTO orders (date_start, date_finish, id_staff, finish_cost, users, id_goods,counts) VALUES (\'{0}\',\'{1}\',\'{2}\',\'{3}\',\'{4}\',\'{5}\',\'{6}\')", 
                "09.06.2021", textBox2.Text, "1" ,textBox6.Text, textBox3.Text, textBox4.Text, textBox5.Text);
            cmd.CommandText = a;
            connection.Open();
            cmd.ExecuteNonQuery();
            connection.Close();
        }
        public static void CopyDataTableToListView(DataTable data, ListView lv)
        {
            lv.BeginUpdate();
            if (lv.Columns.Count != data.Columns.Count)
            {
                lv.Columns.Clear();
                foreach (DataColumn column in data.Columns)
                {
                    lv.Columns.Add(column.ColumnName);
                }
            }

            lv.Items.Clear();
            foreach (DataRow row in data.Rows)
            {
                var list = row.ItemArray.Select(ob => ob.ToString()).ToArray();
                ListViewItem item = new ListViewItem(list);
                lv.Items.Add(item);
            }

            lv.AutoResizeColumns(ColumnHeaderAutoResizeStyle.ColumnContent);
            lv.AutoResizeColumns(ColumnHeaderAutoResizeStyle.HeaderSize);
            lv.EndUpdate();
        }

        Form6 editLine;
        private void Button2_Click(object sender, EventArgs e)
        {
            try
            {
                editLine = new Form6(this);
                editLine.textBox1.Text = dataGridView1.SelectedCells[0].Value.ToString();
                editLine.textBox2.Text = dataGridView1.SelectedCells[1].Value.ToString();
                editLine.textBox3.Text = dataGridView1.SelectedCells[5].Value.ToString();
                editLine.textBox4.Text = dataGridView1.SelectedCells[6].Value.ToString();
                editLine.textBox5.Text = dataGridView1.SelectedCells[7].Value.ToString();
                editLine.textBox6.Text = dataGridView1.SelectedCells[4].Value.ToString();
                editLine.Show(this);
            }
            catch
            {
                MessageBox.Show("Вы не выбрали строку");
            }
            
        }
        public void refreshData()
        {
            Select();
        }

        private void Button3_Click(object sender, EventArgs e)
        {
            try
            {
                
                string column = dataGridView1.SelectedCells[0].Value.ToString();
                NpgsqlCommand cmd = connection.CreateCommand();
                DataTable dt = new DataTable();
                string a = String.Format("DELETE FROM orders WHERE \"ID_order\"={0}", column);
                cmd.CommandText = a;
                connection.Open();
                cmd.ExecuteNonQuery();
                connection.Close();
                editLine = new Form6(this);
                refreshData();
            }
            catch
            {
                MessageBox.Show("Вы не выбрали строку");
            }

            
        }
    }
}
