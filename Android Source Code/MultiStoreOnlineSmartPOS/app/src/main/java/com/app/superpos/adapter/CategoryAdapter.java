package com.app.superpos.adapter;

import android.content.Context;
import android.content.Intent;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.app.superpos.R;
import com.app.superpos.model.Category;
import com.app.superpos.settings.categories.EditCategoryActivity;

import java.util.List;

public class CategoryAdapter extends RecyclerView.Adapter<CategoryAdapter.MyViewHolder> {


    private List<Category> categoryData;
    private Context context;


    public CategoryAdapter(Context context, List<Category> categoryData) {
        this.context = context;
        this.categoryData = categoryData;

    }


    @NonNull
    @Override
    public CategoryAdapter.MyViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.category_item, parent, false);
        return new MyViewHolder(view);
    }


    @Override
    public void onBindViewHolder(@NonNull final CategoryAdapter.MyViewHolder holder, int position) {


        String categoryName = categoryData.get(position).getProductCategoryName();
        holder.txtCategoryName.setText(categoryName);




    }

    @Override
    public int getItemCount() {
        return categoryData.size();
    }

    public class MyViewHolder extends RecyclerView.ViewHolder implements View.OnClickListener {

        TextView txtCategoryName;


        public MyViewHolder(@NonNull View itemView) {
            super(itemView);

            txtCategoryName = itemView.findViewById(R.id.txt_category_name);



            itemView.setOnClickListener(this);

        }

        @Override
        public void onClick(View v) {
            Intent i = new Intent(context, EditCategoryActivity.class);
            i.putExtra("category_id", categoryData.get(getAdapterPosition()).getProductCategoryId());
            i.putExtra("category_name", categoryData.get(getAdapterPosition()).getProductCategoryName());
            context.startActivity(i);
        }
    }


}
