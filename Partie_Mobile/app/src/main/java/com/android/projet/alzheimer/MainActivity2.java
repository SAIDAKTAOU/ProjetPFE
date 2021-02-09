package com.android.projet.alzheimer;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;

public class MainActivity2 extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main2);
    }
    public void notification(View view) {
        Intent intent = new Intent(getApplicationContext(), MainActivity3.class);
        startActivity(intent);
    }

    public void location(View view) {
        Intent intent = new Intent(getApplicationContext(), Map.class);
        startActivity(intent);
    }
}
