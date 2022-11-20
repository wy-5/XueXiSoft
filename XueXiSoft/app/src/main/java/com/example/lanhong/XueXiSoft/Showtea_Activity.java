package com.example.lanhong.XueXiSoft;

import android.app.Activity;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.view.Window;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

public class Showtea_Activity extends Activity implements AdapterView.OnItemClickListener {
    private String[] message = {};
    public ListView Listview;
    //获取课程名字
    public String subject_name;
    //中文名字
    public String subject_name1;
    public TextView subject_teacher;
    private Boolean isSucceed=false;
    GetTeach_name getname=new GetTeach_name();
    //保存老师姓名，用来查询具体的教师信息
    private String name="";
    //保存家长手机号
    public String stu_phone;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        this.requestWindowFeature(Window.FEATURE_NO_TITLE);
        setContentView(R.layout.showteacher);
        Intent intent=this.getIntent();
        Bundle bundle=intent.getExtras();
        subject_name=bundle.getString("subject");
        subject_name1=bundle.getString("subject");
        stu_phone=bundle.getString("phone");
        init();
        //中文转英文
        if (subject_name.equals("计算机网络")) {
            subject_name="math";
        }
        if (subject_name.equals("操作系统")) {
            subject_name="chinese";
        }
        if (subject_name.equals("数据结构")) {
            subject_name="english";
        }
        if (subject_name.equals("MySQL数据库")) {
            subject_name="physical";
        }
        if (subject_name.equals("Android studio")) {
            subject_name="politics";
        }
        if (subject_name.equals("Web前端课程")) {
            subject_name="chemistry";
        }
        if (subject_name.equals("C#/.Net课程")) {
            subject_name="biology";
        }
        if (subject_name.equals("PHP+MySQL课程")) {
            subject_name="geography";
        }
        new AnotherTask().execute((Void[]) null);
    }
    //组件初始化方法
    public void init(){
        subject_teacher=(TextView)findViewById(R.id.subject_teacher);
        subject_teacher.setText(subject_name+"教师");
        Listview =(ListView)findViewById(R.id.show_teacher);
        this.registerForContextMenu(Listview);
        Listview.setOnItemClickListener(this);
    }



    //获取教师信息
    private class AnotherTask extends AsyncTask<Void, Integer, Boolean> {
        @Override
        protected Boolean doInBackground(Void... params) {
            // 对UI组件的更新操作,耗时的操作
            try {
                // 连接到服务器的地址
                String connectURL = "http://192.168.58.1:8085/teacher_pro/teacher.php";
                // 填入用户名密码和连接地址
                isSucceed = getname.getname(subject_name, connectURL);

            } catch (Exception e) {
                e.printStackTrace();
            }
            return null;
        }
        @Override
        protected void onPostExecute(Boolean result) {
            if (isSucceed) {
                message=getname.result.split(",");
                Listview.setAdapter(new ArrayAdapter<String>(Showtea_Activity.this, android.R.layout.simple_list_item_1,message));
            }else {
                Toast.makeText(Showtea_Activity.this, "已加载完成啦！未查询到相关课程的教师！", Toast.LENGTH_SHORT).show();
            }
        }
    }

    @Override
    public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
        // TODO Auto-generated method stub
        name=message[position];
        //传递教师姓名，用来获取对应教师具体信息
        Intent intent=new Intent(Showtea_Activity.this,ShowTeaDet_Activity.class);
        Bundle bundle=new Bundle();
        bundle.putString("teach_name", name);
        bundle.putString("subject", subject_name1);
        bundle.putString("stu_phone", stu_phone);
        intent.putExtras(bundle);
        startActivity(intent);
    }

}
