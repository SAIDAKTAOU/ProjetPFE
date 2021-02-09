package com.android.projet.alzheimer;

import android.content.Intent;
import android.os.Bundle;
import android.support.design.widget.TextInputLayout;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

import com.android.projet.alzheimer.MyRequest.MyRquest;
import com.android.volley.RequestQueue;

/**
 * Created by said on 6/11/2018.
 */

public class LoginActivity extends AppCompatActivity {
    private TextInputLayout til_pseudo,til_password;
    private RequestQueue queue;
    private MyRquest request;
    public static  String Pseudo;


    @Override
    protected void onCreate( Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.login_layout);
        til_pseudo=(TextInputLayout)findViewById(R.id.til_pseudo_log);
        til_password=(TextInputLayout)findViewById(R.id.til_password_log);
        queue = VolleySingleton.getInstance(this).getRequestQueue();
        request = new MyRquest(this, queue);
       // Pseudo = til_pseudo.getEditText().getText().toString().trim();

}

    public void Valider(View view) {
                String pseudo = til_pseudo.getEditText().getText().toString().trim();
                String  password=til_password.getEditText().getText().toString().trim();
                if(pseudo.length()>0 && password.length()>0) {
                    request.connection(pseudo, password, new MyRquest.LoginCallback(){
                        @Override
                        public void onSuccess(String pseudo) {
                            Intent intent=new Intent(getApplicationContext(),MainActivity2.class);
                            //intent.putExtra("REGISTER",message);
                            startActivity(intent);
                            finish();
                            Pseudo = pseudo ;
                        }

                        @Override
                        public void onError(String message) {
                            Toast.makeText(getApplicationContext(),message,Toast.LENGTH_SHORT).show();
                        }
                    });
                }else {
                    Toast.makeText(getApplicationContext(),"veuillez rempler tous les champs",Toast.LENGTH_SHORT).show();
                }
            }
            public static String getPseudo(){
                return Pseudo ;
            }



    }
