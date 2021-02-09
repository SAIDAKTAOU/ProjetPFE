package com.android.projet.alzheimer;

import android.content.Intent;
import android.os.Bundle;
import android.support.design.widget.TextInputLayout;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.ProgressBar;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.Toast;

import com.android.projet.alzheimer.MyRequest.MyRquest;
import com.android.volley.RequestQueue;

import java.util.Map;

/**
 * Created by said on 6/10/2018.
 */

public class RegisterActivity extends AppCompatActivity {
    private ProgressBar pb_loader;
    private RadioGroup radiotype;
    private RadioButton radioButton;

    private TextInputLayout til_pseudo, til_email, til_password, til_password2;
    private RequestQueue queue;
    private MyRquest request;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.register_layout);

        pb_loader = (ProgressBar) findViewById(R.id.pb_loader);
        til_pseudo = (TextInputLayout) findViewById(R.id.til_pseudo);
        til_email = (TextInputLayout) findViewById(R.id.til_email);
        til_password = (TextInputLayout) findViewById(R.id.til_password);
        til_password2 = (TextInputLayout) findViewById(R.id.til_password2);
        //radiotype=(RadioGroup)findViewById(R.id.radioType);
      // int selectedId = radiotype.getCheckedRadioButtonId();
      //  radioButton = (RadioButton) findViewById(selectedId);

        queue = VolleySingleton.getInstance(this).getRequestQueue();
        request = new MyRquest(this, queue);}

    public void Valider(View view) {
        /*int selectedId = radioTypeGroup.getCheckedRadioButtonId();
        radioTypeButton = (RadioButton) findViewById(selectedId);
        Toast.makeText(RegisterActivity.this, radioTypeButton.getText(), Toast.LENGTH_SHORT).show();*/
        pb_loader.setVisibility(View.VISIBLE);
        String pseudo = til_pseudo.getEditText().getText().toString().trim();
        String email = til_email.getEditText().getText().toString().trim();
        String password = til_password.getEditText().getText().toString().trim();
        String password2 = til_password2.getEditText().getText().toString().trim();
       // String Radio = radioButton.getText().toString();
        if (pseudo.length() > 0 && email.length() > 0 && password.length() > 0 && password2.length() > 0) {
            request.register(pseudo, email, password, password2, new MyRquest.RegiterCllback() {
                @Override
                public void onSuccess(String message) {
                    pb_loader.setVisibility(View.GONE);
                    Intent intent = new Intent(getApplicationContext(), MainActivity.class);
                    //intent.putExtra("REGISTER",message);
                    startActivity(intent);
                    finish();


                }

                @Override
                public void inputErrors(Map<String, String> errors) {
                    pb_loader.setVisibility(View.GONE);
                    if (errors.get("pseudo") != null) {
                        til_pseudo.setError(errors.get("pseudo"));
                    } else {
                        til_pseudo.setErrorEnabled(false);
                    }

                    if (errors.get("email") != null) {
                        til_email.setError(errors.get("email"));
                    } else {
                        til_email.setErrorEnabled(false);
                    }
                    if (errors.get("password") != null) {
                        til_pseudo.setError(errors.get("password"));
                    } else {
                        til_password.setErrorEnabled(false);
                    }

                }

                @Override
                public void onError(String message) {
                    pb_loader.setVisibility(View.GONE);
                    Toast.makeText(getApplicationContext(), message, Toast.LENGTH_SHORT).show();

                }
            });
        } else {
            Toast.makeText(getApplicationContext(), "veuillez rempler tous les champs", Toast.LENGTH_SHORT).show();
        }

    }
}


