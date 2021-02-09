package com.android.projet.alzheimer;

import android.annotation.SuppressLint;
import android.app.AlarmManager;
import android.app.DatePickerDialog;
import android.app.Notification;
import android.app.PendingIntent;
import android.app.TimePickerDialog;
import android.content.Context;
import android.content.Intent;
import android.app.DialogFragment;
import android.support.v4.app.NotificationCompat;
import android.support.v4.app.NotificationManagerCompat;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.TimePicker;

import java.util.ArrayList;
import java.util.Calendar;
import java.util.Collections;
import java.util.List;

import static com.android.projet.alzheimer.App.CHANNEL_1_ID;
import static com.android.projet.alzheimer.App.CHANNEL_2_ID;

public class MainActivity3 extends AppCompatActivity implements TimePickerDialog.OnTimeSetListener,DatePickerDialog.OnDateSetListener {
    private NotificationManagerCompat notificationManager;
    private EditText editTextTitle;
    private EditText editTextMessage;
    private TextView date;
    EditText message;
    EditText Title;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main3);
        notificationManager = NotificationManagerCompat.from(this);

        Button btn = (Button) findViewById(R.id.button2);

        btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                DialogFragment TimePicker = new TimePickerFragment();
                TimePicker.show(getFragmentManager(), "time picker");

            }
        });

    }

    int i;
    List<Calendar> arrayList = new ArrayList<Calendar>();
    Calendar c = Calendar.getInstance();

    @SuppressLint("NewApi")
    @Override
    public void onTimeSet(TimePicker view, int hourOfDay, int minute) {


        DialogFragment DatePicker = new DatePickerFragment();
        DatePicker.show(getFragmentManager(), "date picker");


        c.set(Calendar.HOUR_OF_DAY, hourOfDay);

        c.set(Calendar.MINUTE, minute);

        c.set(Calendar.SECOND, 0);

        c.set(Calendar.MILLISECOND, 0);
    }


    @Override
    public void onDateSet(DatePicker view, int year, int month, int dayOfMonth) {


        c.set(Calendar.YEAR, year);
        c.set(Calendar.MONTH, month);
        c.set(Calendar.DAY_OF_MONTH, dayOfMonth);

        arrayList.add(i, c);
        i++;
        Collections.sort(arrayList);


        Title = findViewById(R.id.edit_text_title);
        message = (EditText) findViewById(R.id.edit_text_message);
        Intent notificationIntent = new Intent(this, NotificationReceiver.class);
        notificationIntent.putExtra("msg", message.getText().toString());
        notificationIntent.putExtra("titre", Title.getText().toString());
        PendingIntent broadcast = PendingIntent.getBroadcast(this, 100, notificationIntent, PendingIntent.FLAG_UPDATE_CURRENT);
        for (int i = 0; i < arrayList.size(); ++i) {
            AlarmManager alarmManager = (AlarmManager) getSystemService(Context.ALARM_SERVICE);
            alarmManager.set(AlarmManager.RTC_WAKEUP, arrayList.get(i).getTimeInMillis(), broadcast);


        }

    }

}
